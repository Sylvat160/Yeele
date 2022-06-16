@if($message = Session::get('error'))
    <x-app-alert type="danger" message="{{ $message }}" />
    {{Session::forget('error')}}
  @endif