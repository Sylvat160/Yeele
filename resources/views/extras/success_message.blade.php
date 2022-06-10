@if($message = Session::get('success'))
    <x-app-alert type="success" message="{{ $message }}" />
    {{Session::forget('success')}}
  @endif