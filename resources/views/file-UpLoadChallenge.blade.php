<!DOCTYPE html>
<html>
<head>
  <title>Upload Challenge</title>
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
 
</head>
<body>
 
<div class="container mt-4">
 
  <h2 class="text-center">Challenge Upload</h2>
 
      <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('storeChallenge') }}" >
       @csrf          
          <div class="row">
 
              <div class="col-md-12">
                  <div class="form-group">
                      <input type="file" name="file" placeholder="Choose file" id="file">
                        @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="mt-4">
                    <x-jet-label for="challengeName" value="{{ __('Challenge Name') }}" />
                    <x-jet-input id="challengeName" class="block mt-1 w-full" type="string" name="challengeName" :value="old('challengeName')" required />
                </div>
                <div class="mt-4">
                    <x-jet-label for="hint" value="{{ __('Hint') }}" />
                    <x-jet-input id="hint" class="block mt-1 w-full" type="string" name="hint" :value="old('hint')" required />
                </div>
              </div>
                 
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
              </div>
          </div>     
      </form>
</div>
 
</div>  
</body>
</html>