<x-layout>
    <x-slot:title>Login</x-slot:title>
    <div class="flex flex-col items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md" x-data="{ isRegister: false }">
      <!-- Toggle Buttons -->
      <div class="flex justify-around mb-6">
        <button 
          @click="isRegister = false" 
          :class="{ 'text-blue-500 border-b-2 border-blue-500': !isRegister }" 
          class="text-gray-600 pb-2 focus:outline-none">
          Login
        </button>
        <button 
          @click="isRegister = true" 
          :class="{ 'text-blue-500 border-b-2 border-blue-500': isRegister }" 
          class="text-gray-600 pb-2 focus:outline-none">
          Register
        </button>
      </div>

      <!-- Login Form -->
      <div x-show="!isRegister" x-transition>
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-4">Login</h2>
        <form action="{{ url('api/auth/login') }}" method="POST" class="space-y-4">
          @csrf
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Login</button>
        </form>
      </div>

      <!-- Register Form -->
      <div x-show="isRegister" x-transition>
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-4">Register</h2>
        <form action="{{ url('api/auth/register') }}" method="POST" class="space-y-4">
          @csrf
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="block w-full px-4 py-2 mt-1 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
          </div>
          <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">Register</button>
        </form>
      </div>
    </div>
  </div>
</x-layout>
