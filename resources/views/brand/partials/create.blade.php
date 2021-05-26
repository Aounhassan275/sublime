<script>
    $(document).ready(function(){
        $('.create-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#createForm').attr('action','{{route('brand.store')}}');
        });
    });
</script>
