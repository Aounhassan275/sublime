<script>
    $(document).ready(function(){
        $('body').on('click' ,'.delete-btn',function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#deleteForm').attr('action','{{route('item.destroy','')}}' +'/'+id);
        });
    });
</script>