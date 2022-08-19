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
                                Subject:
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
        <h1> Messages sent:
        </h1>

    <table border="1" width="100%">
        <tr>
            <th>Time</th>
            <th>Content</th>
            <th>#</th>
        </tr>
        @foreach ($messages as $message)
            <tr>
                <td>{{ $message->created_at }}</td>
                <td>{{ $message->body }}</td>
                <td></td>
                
            </tr>    
            
        @endforeach
    </table>
    </div>

</x-app-layout>

    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-6">
                        <div class="space-y-4">
                            @foreach ($threads->messages as $message)
                                <div class="px-4 py-2 leading-relaxed border rounded-lg sm:px-6 sm:py-4">
                                    <strong>{{ $message->user->name }}</strong>
                                    <span class="text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}
                                    </span>
                                    <p class="text-sm">
                                        {{ $message->body }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
  
    {{-- <h1>Message sent to this user:</h1>
    @each('messenger.partials.thread', $threads, 'thread')  --}}
             {{-- @each('messenger.partials.thread', $threads, 'thread',
            'messenger.partials.no-threads'); --}}

