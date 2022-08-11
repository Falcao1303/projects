$(document).ready(function(){

    var idKartProduct = null;

    mascaras();
});

$('[name=form-vendas]').find('[name=id_produto]').change(function(){
    
    if ( $(this).val() !== undefined )
    {
        $('.btn-add-kart').prop('disabled', false);
        idKartProduct = $(this).val();
    }
    else
    {
        $('.btn-add-kart').prop('disabled', true);
        idKartProduct = null;
    }
});


$('.btn-add-kart').on('click', function(e){
    e.preventDefault();

    let form = $('[name=form-vendas]');
    let qtty = $(form.find('[name=quantidade]')).val();

    $.ajax({
        url: '/produtos/findjson/',
        method: 'GET',
        type: 'json',
        data: {id: idKartProduct}
    })
    .done(function(data){
        console.log('success');

        let json = JSON.parse(data);
        
        if (qtty > parseInt(json.estoque))
        {
            alert('Estoque insuficiente para este produto. \nNo momento dispomos apenas '+ json.estoque + ' unidades em estoque.');
        }
        else
        {
            form.submit();
            return false;
        }
    })
    .fail(function(data){
        console.log('error');
    });


});



function editarTipo(id) 
{
    $.ajax({
        url: 'tipos/find/',
        type: 'GET',
        dataType: 'json',
        data: {'id': id}
    })
    .done(function(data){
        var form = $('[name=form-tipos]');
        form.find('[name=id]').val(data.id);
        form.find('[name=nome]').val(data.nome);
        form.find('[name=aliquota]').val(data.aliquota);
        form.find('[name=descricao]').val(data.descricao);

    })
    .fail(function(data){
        console.log('Ocorreu um erro!');
    });

}



function editarProduto(id) 
{
    $.ajax({
        url: 'produtos/findjson/',
        type: 'GET',
        dataType: 'json',
        data: {'id': id}
    })
    .done(function(data){
        var form = $('[name=form-produtos]');
        form.find('[name=id]').val(data.id);
        form.find('[name=nome]').val(data.nome);
        form.find('[name=preco]').val(data.preco);
        form.find('[name=descricao]').val(data.descricao);
        form.find('[name=estoque]').val(data.estoque);

        $('select[name=id_tipo] option').each(function(){
            if ( $(this).val() == data.id_tipo )
            {
                $(this).prop('selected', true);
            }
        });

    })
    .fail(function(data){
        console.log('Ocorreu um erro!');
    });

}



function mascaras()
{
    // Formata para moeda.
    $("[mascara=currency]").on("focus", function () {
        $(this).mask('000.000.000,00', {
            reverse: true
        });
    });


}

