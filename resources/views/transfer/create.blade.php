<x-layout>
    <x-slot:title>Create Transfer</x-slot:title>
    <div class="max-w-lg mx-auto mt-10 p-4 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Create Transfer</h2>
        <form method="POST" action="{{ route('transfer.create') }}">
            @csrf
            <div class="mb-4">
                <label for="nilai_transfer" class="block text-gray-700 font-semibold mb-2">Nilai Transfer</label>
                <input type="number" id="nilai_transfer" name="nilai_transfer" class="w-full border border-gray-300 p-2 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="bank_tujuan" class="block text-gray-700 font-semibold mb-2">Bank Tujuan</label>
                <input type="text" id="bank_tujuan" name="bank_tujuan" class="w-full border border-gray-300 p-2 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="rekening_tujuan" class="block text-gray-700 font-semibold mb-2">Rekening Tujuan</label>
                <input type="text" id="rekening_tujuan" name="rekening_tujuan" class="w-full border border-gray-300 p-2 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="atasnama_tujuan" class="block text-gray-700 font-semibold mb-2">Atas Nama Tujuan</label>
                <input type="text" id="atasnama_tujuan" name="atasnama_tujuan" class="w-full border border-gray-300 p-2 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="bank_pengirim" class="block text-gray-700 font-semibold mb-2">Bank Pengirim</label>
                <input type="text" id="bank_pengirim" name="bank_pengirim" class="w-full border border-gray-300 p-2 rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Transfer</button>
        </form>
    </div>
</x-layout>
