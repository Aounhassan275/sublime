<script>
    $(document).ready(function(){
        let id;
    
        $('.brand').on('change', function() {
            id = this.value;
            fetchModelsByBrand(id);
        });
        function fetchModelsByBrand(id){
            $.ajax({
                url: "{{route('brand.models')}}",
                method: 'post',
                data: {
                    id: id
                },
                success: function(result){
                    console.log(result);
                    appendSectionsList(result,$('.model'));
                }
            });
        }
        function appendSectionsList(result,div) {
            div.empty();
            div.append('<option selected disabled>Select Model</option>');
            for (i=0;i<result.length;i++){
                div.append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
            }
        }
    
    });
</script>