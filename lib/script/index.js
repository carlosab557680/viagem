$(function () {


    //Default
    $('#multiCollapseEmpresaSim').collapse('show');
    $('#multiCollapseEnderecoNacional').collapse('show');

    $('#multiCollapseResideExteriorNao').collapse()
    
    $( "#atuaEmpresaSim" ).click(function() {
         $('#multiCollapseEmpresaNao').collapse('hide');
         $('#multiCollapseEmpresaSim').collapse('show');
      });

      $( "#atuaEmpresaNao" ).click(function() {
        $('#multiCollapseEmpresaNao').collapse('show');
        $('#multiCollapseEmpresaSim').collapse('hide');
     });

     $( "#Reside_no_Exterior__c" ).click(function() {
        $('#multiCollapseEmpresaNao').collapse('show');
        $('#multiCollapseEmpresaSim').collapse('hide');
     });


     $( "#resideExteriorSim" ).click(function() {
        $('#multiCollapseEnderecoNacional').collapse('hide');
        $('#multiCollapseEnderecoInternacional').collapse('show');
    
     });

     $( "#resideExteriorNao" ).click(function() {
        $('#multiCollapseEnderecoInternacional').collapse('hide');
        $('#multiCollapseEnderecoNacional').collapse('show');
        
     });
     



      


    /*
    *    MÁSCARAS
    */

    // data de nascimento
    $("#00N1500000I35uK").mask('00/00/0000', {placeholder: "__/__/____"})
    // cpf
    $("#00N1500000HQeC7").mask('00000000000', {reverse: true});
    // celular
    $('#mobile').mask('00 000000000');
    // telefone
    $('#phone').mask('00 00000000');
    // cep
    $('#00N1500000I24at').mask('00000000');
    // ra
    $('#00N1500000GVtYZ').mask('000000');
    // ano formatura
    $('#00N0U000000XBqd').mask('0000');
    // cep empresa
    $('#00N1C00000IY2Hb').mask('00000-000');

    /*
    *   FUNÇÕES
    */
    var url_cep = "https://www3.facens.br/global/webservice/geral/getAddress/";

    // atualmente empregado
    $("#00N1500000HQeCN").change(function () {
        $('#info_empresariais').toggle('slow');
    });

    // cep residenciais
    $('#00N1500000I24at').blur(function () {
        $.ajax({
            url: url_cep + $(this).val(),
            type: "GET",
            beforeSend: function () {
                console.log('send');
                $('.spin_residencial').toggle('slow');
            },
            complete: function () {
                $('.spin_residencial').toggle('fast');
            }
        })
            .done(function (data) {
                if (data.success) {
                    popula_endereco_residencial(data.address);
                }
            });
    });

    // cep comercial
    $('#00N1C00000IY2Hb').blur(function () {
        $.ajax({
            url: url_cep + $(this).val(),
            type: "GET",
            beforeSend: function () {
                console.log('send');
                $('.spin_comercial').toggle('slow');
            },
            complete: function () {
                console.log('complete');
                $('.spin_comercial').toggle('slow');
            }
        })
            .done(function (data) {
                if (data.success) {
                    popula_endereco_comercial(data.address);
                }
            });
    });

    /*
    *   FUNÇÕES AUXILIARES
    */
    var popula_endereco_residencial = function (address) {
        // logradouro
        if (address.logradouroCompleto) {
            $('#00N1500000I24b6')
                .val(address.logradouroCompleto);
        }

        // bairro
        if (address.bairro) {
            $('#00N1500000HQeC6')
                .val(address.bairro);
        }
    
        // cidade 
        if (address.cidade) {
            $('#00N1500000IZnXt')
                .val(address.cidade);
        }

        // pais
        if (address.bairro) {
            $('#country')
                .val(address.pais);
        }

        // estado
        if (address.estado) {
            $('#00N1500000I24b0')
                .val(address.estado);
        }

    }

    var popula_endereco_comercial = function (address) {
        // logradouro
        if (address.logradouroCompleto) {
            $('#00N1C00000IY2Hj')
                .val(address.logradouroCompleto);
        }

        // bairro
        if (address.bairro) {
            $('#00N1C00000IY2Ha')
                .val(address.bairro);
        }
    
        // cidade 
        if (address.cidade) {
            $('#00N1C00000IY2Hc')
                .val(address.cidade);
        }

        // pais
        if (address.bairro) {
            $('#00N1C00000IY2Hl')
                .val(address.pais);
        }

        // estado
        if (address.estado) {
            $('#00N1C00000IY2Hh')
                .val(address.estado);
        }

    }
});