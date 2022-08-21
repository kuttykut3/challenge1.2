<x-app-layout>
    <h1>    {{$detailuser->name}}
    </h1>
    <h3>    {{ ($detailuser->role == '0') ? 'Student' : 'Teacher' }}
    </h3>
    <h1>    {{$detailuser->email}}
    </h1>
    <h1>    {{$detailuser->phone}}
    </h1>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('messages.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <!-- Subject Form Input -->
                            <div>
                                Message Subject:
                                <label for="subject" :value="__('Subject')" >
                                <input id="subject" class="block w-full mt-1" type="text" name="subject"
                                    :value="old('subject')" >
                                    {{-- <x-input id="subject" class="block w-full mt-1" type="text" name="subject"
                                    :value="old('subject')" /> --}}
                            </div>

                            <!-- Recipients list -->
                            <div class="mt-4">
                                <label for="recipient" :value="__('Recipient')" >
                                {{-- <x-label for="recipient" :value="__('Recipient')" /> --}}
                                <select name="recipient"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="{{ $detailuser->id }}">{{ $detailuser->name }}</option>
                                </select>
                            </div>

                            <!-- Message Form Input -->
                            <div class="mt-4">
                                Message:
                                <label for="message" :value="__('Message')" >
                                <textarea name="message" rows="10"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('message') }}</textarea>
                            </div>

                            <!-- Submit Form Input -->
                            <div class="mt-4">
                                <button>Send</button>
                                {{-- <x-button>Submit</x-button> --}}
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div>
        <form action="{{ route('messages') }} ", method="GET">
            @csrf
                <button>
                    View Messages Sent
                </button>
        </form>

</x-app-layout>

   

