@component('mail::message')
# New Post from {{ $website }}

Hi, There is a new post published at {{ $website }}
<br>

Title: {{ $title }}
Description: {{ $description  }}

Thanks,<br>
    {{ " - Subscription Platform - " }}
@endcomponent
