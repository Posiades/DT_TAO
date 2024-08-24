<form id="auto-submit-form" method="POST" action="{{ route('logVisit') }}">
    @csrf
    <input type="hidden" name="city" id="infoipv4">
</form>

