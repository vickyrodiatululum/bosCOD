<x-layout>
    <x-slot:title>Update Token</x-slot:title>
    <div class="max-w-md mx-auto mt-10 p-4 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Update Token</h2>
        <form method="POST" action="{{ route('auth.updateToken') }}">
            @csrf
            <div class="mb-4">
                <label for="token" class="block text-gray-700 font-semibold mb-2">Refresh Token</label>
                <input type="text" id="token" name="token" class="w-full border border-gray-300 p-2 rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Update Token</button>
        </form>
    </div>
</x-layout>
