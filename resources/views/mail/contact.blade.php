<p>{{ ucfirst(trans('front/contact.new_message', compact('name'))) }} :</p>
<p>
    "{{ $msg }}"
</p>
<p>
    Mr/Mme {{ $name }}, {{ $tel }}, <a href="mailto:{{ $email }}" target="_top">&lt;{{ $email }}&gt;</a>
</p>