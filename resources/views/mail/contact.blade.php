<p>{{ ucfirst(trans('front/contact.new_message', compact('name'))) }} :</p>
<p>
    "{{ $message }}"
</p>
<p>
    Mr/Mme {{ $name }}, {{ $tel }}, <a href="mailto:{{ $email }}" target="_top">&lt;{{ $email }}&gt;></a>
</p>