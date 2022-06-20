@if($message = Session::get('warning'))
    <x-app-alert type="warning" message="{{ $message }}" />
    {{Session::forget('warning')}}
  @endif