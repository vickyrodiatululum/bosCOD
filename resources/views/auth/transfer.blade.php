<x-layout>
    <x-slot:title>Transfer</x-slot:title>
    <div class="flex flex-col items-center justify-center mt-10">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">Formulir Transfer</h2>
            <form action="{{ url('/api/transfer') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Nilai Transfer -->
                <div>
                    <label for="nilai_transfer" class="block text-sm font-medium text-gray-700">Nilai Transfer</label>
                    <input type="number" id="nilai_transfer" name="nilai_transfer" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Bank Tujuan -->
                <div>
                    <label for="bank_tujuan" class="block text-sm font-medium text-gray-700">Bank Tujuan</label>
                    <select id="bank_tujuan" name="bank_tujuan" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="" disabled selected>Pilih Bank Tujuan</option>
                        <option value="1">Bank A</option>
                        <option value="2">Bank B</option>
                        <!-- Tambahkan opsi bank sesuai kebutuhan -->
                    </select>
                </div>

                <!-- Rekening Tujuan -->
                <div>
                    <label for="rekening_tujuan" class="block text-sm font-medium text-gray-700">Rekening Tujuan</label>
                    <input type="text" id="rekening_tujuan" name="rekening_tujuan" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Atas Nama Tujuan -->
                <div>
                    <label for="atasnama_tujuan" class="block text-sm font-medium text-gray-700">Atas Nama Tujuan</label>
                    <input type="text" id="atasnama_tujuan" name="atasnama_tujuan" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Bank Pengirim -->
                <div>
                    <label for="bank_pengirim" class="block text-sm font-medium text-gray-700">Bank Pengirim</label>
                    <select id="bank_pengirim" name="bank_pengirim" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="" disabled selected>Pilih Bank Pengirim</option>
                        <option value="1">Bank A</option>
                        <option value="2">Bank B</option>
                        <!-- Tambahkan opsi bank sesuai kebutuhan -->
                    </select>
                </div>

                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                    Transfer
                </button>
            </form>
        </div>
    </div>
</x-layout>
