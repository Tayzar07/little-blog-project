@props(['profile'])
<x-layout>

    {{-- success message --}}

    <x-success-msg />

    <div>
        <div class=" p-5 pe-7 w-[90%] mx-auto rounded-lg bg-white/10 backdrop-blur-sm my-[20px]">
            <h1 class="text-white mb-5 md:text-2xl text-lg ">Edit Profile</h1>
            <img class="mb-5 border p-2 bg-white/30 rounded-full" width="150px"
                src="{{ $profile->avatar ? "/storage/{$profile->avatar}" : '/storage/default-photos/default-profile.jpg' }}"
                alt="">
            <form action="/user/profile/update" class="flex flex-col gap-3" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="text-white ms-1" for="">Avatar</label>
                    <input type="file"
                        class="border file:bg-white/10 file:border-white file:rounded-lg file:text-white bg-white/10 border-white text-white rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300"
                        name="avatar" id="">
                    @error('avatar')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">Name</label>
                    <input name="name"
                        class="border text-white bg-transparent border-white rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300"
                        placeholder="full name..." type="text" value="{{ old('name', $profile->name) }}">
                    @error('name')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">Email</label>
                    <input name="email"
                        class="border text-white border-white bg-transparent rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300"
                        placeholder="email@example.com" type="text" value="{{ old('name', $profile->email) }}">
                    @error('email')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div>
                    <label class="text-white ms-1" for="">Password</label>
                    <div class="relative">
                        <input name="password" id="password"
                            class="border w-full rounded-lg m-1 px-3 py-2  placeholder-gray-300"
                            placeholder="password..." type="password">
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 px-4 text-sm text-gray-400 hover:text-blue-600 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">Confirm Password</label>
                    <div class="relative">
                        <input name="password_confirmation" id="confirmPassword"
                            class="border w-full rounded-lg m-1 px-3 py-2 placeholder-gray-300"
                            placeholder="confirm password..." type="password">
                        <button type="button" id="toggleConfirmPassword"
                            class="absolute inset-y-0 right-0 px-4 text-sm text-gray-400 hover:text-blue-600 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

                <input
                    class="border mt-3 w-[100px] bg-blue-700 rounded-lg m-1 px-3 py-2 text-white hover:bg-blue-800 cursor-pointer"
                    type="submit" value="Update">
            </form>
        </div>

        <div class=" w-[90%] mx-auto rounded-lg p-5 pe-7 w-full bg-white/10 backdrop-blur-sm my-[20px]">
            <h1 class="text-white mb-5 md:text-2xl text-lg ">Change Password</h1>
            <form action="{{ route('password.update') }}" class="flex flex-col gap-3" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div>
                    <label class="text-white ms-1" for="">Current Password</label>
                    <div class="relative">
                        <input name="current_password" id="current_password"
                            class="text-white bg-transparent border-white border w-full rounded-lg m-1 px-3 py-2  placeholder-gray-300"
                            placeholder="current password..." type="password">
                        <button type="button" id="toggleCurrentPassword"
                            class="absolute inset-y-0 right-0 px-4 text-sm text-white hover:text-blue-600 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('current_password')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">New Password</label>
                    <div class="relative">
                        <input name="password" id="password"
                            class="text-white bg-transparent border-white border w-full rounded-lg m-1 px-3 py-2  placeholder-gray-300"
                            placeholder="new password..." type="password">
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 px-4 text-sm text-white hover:text-blue-600 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">Confirm Password</label>
                    <div class="relative">
                        <input name="password_confirmation" id="confirmPassword"
                            class="text-white bg-transparent border-white border w-full rounded-lg m-1 px-3 py-2 placeholder-gray-300"
                            placeholder="confirm password..." type="password">
                        <button type="button" id="toggleConfirmPassword"
                            class="absolute inset-y-0 right-0 px-4 text-sm text-white hover:text-blue-600 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <input
                    class="border text-white mt-3 w-[100px] bg-blue-700 rounded-lg m-1 px-3 py-2 text-white hover:bg-blue-800 cursor-pointer"
                    type="submit" value="Update">
            </form>
        </div>
    </div>
</x-layout>
