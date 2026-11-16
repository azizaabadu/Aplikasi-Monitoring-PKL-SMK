<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DudiController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $dudis = Dudi::query()
            ->with('user:id,name,username,peran,aktif')
            ->withCount('penempatans')
            ->when($request->filled('search'), function ($query) use ($request): void {
                $query->where('nama_dudi', 'like', '%'.$request->string('search')->toString().'%');
            })
            ->orderBy('nama_dudi')
            ->paginate(20);

        return response()->json($dudis);
    }

    public function store(Request $request): JsonResponse
    {
        $dudi = Dudi::create($this->validatedData($request));

        return response()->json($dudi->load('user:id,name,username,peran,aktif'), 201);
    }

    public function show(Dudi $dudi): JsonResponse
    {
        return response()->json($dudi->load('user:id,name,username,peran,aktif'));
    }

    public function update(Request $request, Dudi $dudi): JsonResponse
    {
        $dudi->update($this->validatedData($request, $dudi));

        return response()->json($dudi->refresh()->load('user:id,name,username,peran,aktif'));
    }

    public function destroy(Dudi $dudi): JsonResponse
    {
        $dudi->update(['aktif' => false]);
        $dudi->user?->update(['aktif' => false]);

        return response()->json(['message' => 'DUDI dinonaktifkan.']);
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request, ?Dudi $dudi = null): array
    {
        $uniqueAccount = Rule::unique('dudis', 'user_id');
        $required = $dudi === null ? 'required' : 'sometimes';

        if ($dudi !== null) {
            $uniqueAccount->ignore($dudi->id);
        }

        return $request->validate([
            'nama_dudi' => [$required, 'string', 'max:255'],
            'alamat' => [$required, 'string', 'max:5000'],
            'pimpinan' => ['nullable', 'string', 'max:255'],
            'kontak' => ['nullable', 'string', 'max:50'],
            'kuota' => [$required, 'integer', 'min:0'],
            'user_id' => [
                'nullable',
                Rule::exists('users', 'id')->where('peran', 'pembimbing_dudi')->where('aktif', true),
                $uniqueAccount,
            ],
            'aktif' => ['sometimes', 'boolean'],
        ]);
    }
}
