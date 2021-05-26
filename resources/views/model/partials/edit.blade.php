<script>
    $(document).ready(function(){
        $('body').on('click' ,'.edit-btn',function(){
            let name = this.name;
            let brand = $(this).attr('brand');
            let id = $(this).attr('id');
            $('#name').val(name);
            $('#brand').val(brand);
            $('#brand').change();
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('model.update','')}}' +'/'+id);
        });
    });
</script>