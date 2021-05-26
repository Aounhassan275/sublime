<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let name = this.name;
            let brand = $(this).attr('brand');
            let model = $(this).attr('model');
            let amount = $(this).attr('amount');
            let id = $(this).attr('id');
            $('#name').val(name);
            $('#amount').val(amount);
            $('#brand').val(brand);
            $('#brand').change();
            $('#model').val(model);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('item.update','')}}' +'/'+id);
        });
    });
</script>