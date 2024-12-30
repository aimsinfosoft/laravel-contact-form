<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('vendor/contactform/css/bootstrap.min.css') }}">

    <script type="module" src="{{asset('vendor/contactform/js/model-viewer.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/contactform/css/style.css') }}">
</head>
<body>
  <div class="form-container-main">
  <div class="form-container">
    <div class="form-image">
      <h1 class="montserrat">Contact Us</h1>
      <model-viewer class="model" alt="laptop" src="{{asset('vendor/contactform/js/laptop.glb')}}" shadow-intensity="1"  camera-controls touch-action="pan-y"  environment-image="{{asset('vendor/contactform/js/dancing_hall_2k.hdr')}}" exposure="1.5"   disable-zoom disable-tap  camera-orbit="-45deg 60deg 9m" autoplay ></model-viewer> 
    </div>
    <form action="{{ route('contact.submit')}}" class="contact-form" method="POST">
      @session('success')
        <div class="alert alert-success">{{ session('success')}}</div>
      @endsession
      @session('error')
        <div class="alert alert-danger">{{ session('error')}}</div>
      @endsession
      @csrf
    <div class="form">
      <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}" autofocus>
      @error('name')
        <div class="error-message">{{ $message }}</div>
      @enderror
      <input type="email" id="mail" name="email" placeholder="Email" value="{{ old('email') }}" >
      @error('email')
        <div class="error-message">{{ $message }}</div>
      @enderror
      <textarea name="message" id="message" cols="30" rows="10" placeholder="Say Hello" >{{ old('message') }}</textarea>
      @error('message')
        <div class="error-message">{{ $message }}</div>
      @enderror
      <div class="button-container">
        <input type ="submit" class="send-button" value="Send">
      </div>
    </div>
  </form>
  </div>
</div>
</body>
</html>
