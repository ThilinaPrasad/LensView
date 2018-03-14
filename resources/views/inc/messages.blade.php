@if(session('success'))
<script>
    $.alert({
    theme: 'modern',
    icon: 'far fa-check-circle',
    title: 'Success !',
    content: "{{ session('success') }}",
    autoClose: 'ok|3000',
    type: 'green',
            typeAnimated: true,
});
</script>
@endif 

@if(session('error'))
<script>
    $.alert({
    theme: 'modern',
    icon: 'far fa-times-circle',
    title: 'Alert !',
    content: "{{ session('error') }}",
    autoClose: 'ok|3000',
    type: 'red',
            typeAnimated: true,
});
</script>
@endif