<script>
    $(document).ready(function(){
        $('body').on('click' ,'.edit-btn',function(){
            let name = this.name;
            let id = $(this).attr('id');
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('brand.update','')}}' +'/'+id);
        });
    });
</script>