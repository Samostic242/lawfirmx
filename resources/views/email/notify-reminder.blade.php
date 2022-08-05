@component('mail::message')
Dear Client, This is to notify you that your passport photograph has not been received by our law firm
for profiling, Kindly make out time to get it us as soon as possible, Thanks

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
