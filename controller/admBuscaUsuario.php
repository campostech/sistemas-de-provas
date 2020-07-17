<?php



// Cria as linhas com os dados do laboratorio
function listaUsuario(){
    
    
//QUERY que será executada no bando de dados
    $query = "SELECT E.CODIGO AS CODIGO,E.FK_USUARIO_CPF AS USUARIO_CPF,E.CEP AS CEP,E.RUA AS RUA,E.BAIRRO AS BAIRRO, E.CIDADE AS CIDADE, E.UF AS ESTADO,E.NUMERO AS NUMERO,U.CPF AS CPF,U.RG as RG,U.NOME AS NOME,U.PERFIL AS PERFIL,U.NOME_PAI AS NOME_PAI,U.NOME_MAE AS NOME_MAE,U.SEXO AS SEXO,U.NATURALIDADE AS NATURALIDADE,U.DATA_NASC AS DATA_NASC,U.TELEFONE AS TELEFONE,U.CELULAR AS CELULAR,U.CATEGORIA AS CATEGORIA,U.INSCRICAO AS INSCRICAO, U.EMAIL AS EMAIL,date_format(`DATA_NASC`,'%d/%m/%Y') as `data_formatada` FROM ENDERECO AS E INNER JOIN USUARIO AS U ON E.FK_USUARIO_CPF =U.CPF";
    $resultado = mysqli_query(buscaconexao(),$query);
    
//Resultado da QUERY executada no bando de dados
    while($usuario = mysqli_fetch_array($resultado)){
      
    // mysqli_fetch_assoc Transforma o resultado do select em um conjunto onde o dado que busta na tabela pode ser referênciado pelo nome da coluna.
        // Cria a LINHA  
   if($_SESSION['PERFIL'] == 1){ 
        echo "<!-- LINHA DO LABORATORIO -->
            <tr>
                <td>".$usuario["CPF"]."</td>
                <td>".$usuario["NOME"]."</td>
                <td class='text-center'>
                    <div class='list-icons'>
                        <div class='dropdown'>
                            <a href='#' class='list-icons-item' data-toggle='dropdown'>
                                <i class='icon-menu9'></i>
                            </a>

                            <div class='dropdown-menu dropdown-menu-right'>
                                <a href='#' data-toggle='modal' data-target='.bd-example-modal-xl".$usuario['CPF']."' class='dropdown-item'><i class='icon-file-pdf'></i> Visualizar</a>
                                <a href='#' data-toggle='modal' data-target='.bd-example-modal-xl-2".$usuario['CPF']."' class='dropdown-item'><i class='icon-file-excel'></i> Editar</a>
                                <a href='#' data-target='#modalExcluir'".$usuario['CPF']."' data-toggle='modal' class='dropdown-item'><i class='icon-file-word'></i> Excluir</a>
                            </div>
                        </div>
                    </div>                 
                </td>
            </tr>  
                                    <div class='modal fade bd-example-modal-xl".$usuario['CPF']."' tabindex='-1' role='dialog' aria-labelledby='myExtraLargeModalLabel' aria-hidden='true'>
                                      <div class='modal-dialog modal-xl' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLongTitle'>Usuário</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                        <div class='modal-body'>
                                            <div class='container'>
                                                <form>
                                                    <h2>Informações Pessoais</h2>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='nome'>Nome do Aluno</label>
                                                            <input disabled type='text' value='".$usuario['NOME']."' class='form-control' id='nome' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='cpf'>CPF</label>
                                                            <input disabled value='".$usuario['CPF']."' type='text' class='form-control' id='cpf' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='rg'>RG</label>
                                                            <input disabled value='".$usuario['RG']."' type='text' class='form-control' id='cpf' placeholder='Example input placeholder'>
                                                        </div>     
                                                        <div class='form-group col-md-6'>
                                                            <label for='nome_pai'>NOME DO PAI</label>
                                                            <input disabled value='".$usuario['NOME_PAI']."' type='text' class='form-control' id='nome_pai' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='nome_mae'>NOME DA MÃE</label>
                                                            <input disabled value='".$usuario['NOME_MAE']."' type='text' class='form-control' id='nome_mae' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='sexo'>SEXO</label>
                                                            <input disabled value='".$usuario['SEXO']."' type='text' class='form-control' id='sexo' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='naturalidade'>NATURALIDADE</label>
                                                            <input disabled value='".$usuario['NATURALIDADE']."' type='text' class='form-control' id='naturalidade' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='data_nasc'>DATA DE NASCIMENTO</label>
                                                            <input disabled value='".$usuario['data_formatada']."' type='text' class='form-control' id='data_nasc' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='telefone'>TELEFONE</label>
                                                            <input disabled value='".$usuario['TELEFONE']."' type='text' class='form-control' id='telefone' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='celular'>CELULAR</label>
                                                            <input disabled value='".$usuario['CELULAR']."' type='text' class='form-control' id='celular' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='categoria'>CATEGORIA</label>
                                                            <input disabled value='".$usuario['CATEGORIA']."' type='text' class='form-control' id='categoria' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inscricao'>INSCRIÇÃO</label>
                                                            <input disabled value='".$usuario['INSCRICAO']."' type='text' class='form-control' id='inscricao' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='email'>EMAIL</label>
                                                            <input disabled value='".$usuario['EMAIL']."' type='text' class='form-control' id='email' placeholder='Example input placeholder'>
                                                        </div> 
                                                    </div>
                                                    <hr>
                                                    <h2>Endereço</h2>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='cep'>CEP</label>
                                                            <input disabled value='".$usuario['CEP']."' type='text' class='form-control' id='cep' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='rua'>RUA</label>
                                                            <input disabled value='".$usuario['RUA']."' type='text' class='form-control' id='rua' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='bairro'>BAIRRO</label>
                                                            <input disabled value='".$usuario['BAIRRO']."' type='text' class='form-control' id='bairro' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='cidade'>CIDADE</label>
                                                            <input disabled value='".$usuario['CIDADE']."' type='text' class='form-control' id='cidade' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='estado'>ESTADO</label>
                                                            <input disabled value='".$usuario['ESTADO']."' type='text' class='form-control' id='estado' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='numero'>NUMERO</label>
                                                            <input disabled value='".$usuario['NUMERO']."' type='text' class='form-control' id='numero' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='row'>
                                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                                                        </div>  
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                    
                                    
                    
                                    <div class='modal fade bd-example-modal-xl-2".$usuario['CPF']."' tabindex='-1' role='dialog' aria-labelledby='myExtraLargeModalLabel' aria-hidden='true'>
                                      <div class='modal-dialog modal-xl' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLongTitle'>Usuário</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                        <div class='modal-body'>
                                            <div class='container'>
                                                <form>
                                                    <h2>Informações Pessoais</h2>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='nome'>Nome do Aluno</label>
                                                            <input  type='text' value='".$usuario['NOME']."' class='form-control' id='nome' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='cpf'>CPF</label>
                                                            <input  value='".$usuario['CPF']."' type='text' class='form-control' id='cpf' placeholder='Example input placeholder'>
                                                        </div>    
                                                        <div class='form-group col-md-6'>
                                                            <label for='nome_pai'>NOME DO PAI</label>
                                                            <input  value='".$usuario['NOME_PAI']."' type='text' class='form-control' id='nome_pai' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='nome_mae'>NOME DA MÃE</label>
                                                            <input  value='".$usuario['NOME_MAE']."' type='text' class='form-control' id='nome_mae' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='sexo'>SEXO</label>
                                                            <input  value='".$usuario['SEXO']."' type='text' class='form-control' id='sexo' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='naturalidade'>NATURALIDADE</label>
                                                            <input  value='".$usuario['NATURALIDADE']."' type='text' class='form-control' id='naturalidade' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='data_nasc'>DATA DE NASCIMENTO</label>
                                                            <input  value='".$usuario['data_formatada']."' type='text' class='form-control' id='data_nasc' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='telefone'>TELEFONE</label>
                                                            <input  value='".$usuario['TELEFONE']."' type='text' class='form-control' id='telefone' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='celular'>CELULAR</label>
                                                            <input  value='".$usuario['CELULAR']."' type='text' class='form-control' id='celular' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='categoria'>CATEGORIA</label>
                                                            <input  value='".$usuario['CATEGORIA']."' type='text' class='form-control' id='categoria' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='inscricao'>INSCRIÇÃO</label>
                                                            <input  value='".$usuario['INSCRICAO']."' type='text' class='form-control' id='inscricao' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='email'>EMAIL</label>
                                                            <input  value='".$usuario['EMAIL']."' type='text' class='form-control' id='email' placeholder='Example input placeholder'>
                                                        </div> 
                                                    </div>
                                                    <hr>
                                                    <h2>Endereço</h2>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='cep'>CEP</label>
                                                            <input  value='".$usuario['CEP']."' type='text' class='form-control' id='cep' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='rua'>RUA</label>
                                                            <input  value='".$usuario['RUA']."' type='text' class='form-control' id='rua' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='bairro'>BAIRRO</label>
                                                            <input  value='".$usuario['BAIRRO']."' type='text' class='form-control' id='bairro' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='cidade'>CIDADE</label>
                                                            <input  value='".$usuario['CIDADE']."' type='text' class='form-control' id='cidade' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='estado'>ESTADO</label>
                                                            <input  value='".$usuario['ESTADO']."' type='text' class='form-control' id='estado' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='numero'>NUMERO</label>
                                                            <input  value='".$usuario['NUMERO']."' type='text' class='form-control' id='numero' placeholder='Example input placeholder'>
                                                        </div>   
                                                    </div>
                                                    <div>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                                        <button type='button' class='btn btn-primary'>Salvar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                    
                                    <div class='modal fade' id='modalExcluir' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Excluir Usuário</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                Tem certeza que deseja excluir o usuário ?
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                <button type='button' class='btn btn-primary'>Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>";
   }}}   
        
//     }else{
//         echo "<!-- LINHA DO LABORATORIO -->
//             <tr>
//                 <td><a href='' title='' class='ls-ico-screen'>".$laboratorio["DESCTIPO"]."</a></td>
//                 <td>".$laboratorio["DESC"]."</td>
//                 <td>".$laboratorio["SALA"]."</td>
//                 <td>".$laboratorio["ANDAR"]."</td>
//                   <td><form action='editarLaboratorio.php'  method='POST' class='ls-form-inline row' >
// <input type='hidden' name='ID' placeholder='' required  value='".$laboratorio['ID']."'>                         
// <button  type='submit' class='ls-btn ls-ico-eye'></button>
                      
// </form>                              

//                                  </div>
//                             </div>
//                           </div>
//                     </td>
//              </tr> "; 
//     }
//     }
//   }
 
// function ListaMultipla($idLAB){
//   $op="";
//   $queryinsumo = "SELECT ID , DESCRICAO FROM INSUMO";
//   $queryinsumo = mysqli_query(buscaconexao(),$queryinsumo);

//   while($selec = mysqli_fetch_assoc($queryinsumo)){

//         $query2 = "SELECT COUNT(*) AS CONT FROM INSUMO_LAB WHERE LABORATORIO_ID = ".$idLAB." AND INSUMO_ID = ".$selec["ID"].";";
//         $resultado2 = mysqli_query(buscaconexao(),$query2);
//         $resultado2 = mysqli_fetch_assoc($resultado2);
//             if($resultado2['CONT'] > 0){
//                 $op .= "<option value='".$selec["ID"]."' selected >".$selec["DESCRICAO"]."</option>";
//             }else{
//                 $op .= "<option value='".$selec["ID"]."' >".$selec["DESCRICAO"]."</option>";
//             }
        
     
      
    
//   }
//   return $op;
  
// }
  
  
// function listaInsumo2($idSelecionado2){
//   $op="";
//   $query2 = "select * from INSUMO";
//   $resultado2 = mysqli_query(buscaconexao(),$query2);
//   while($insumo2 = mysqli_fetch_assoc($resultado2)){
//       if($idSelecionado2==$insumo2["ID"] ) {
//           $op .= "<option selected value='".$insumo2["ID"]."'>".$insumo2["DESCRICAO"]."</option>";
//       }else{
//           $op .= "<option value='".$insumo2["ID"]."'>".$insumo2["DESCRICAO"]."</option>";
//       }
      
//   }
//   return $op;
  
// }


// //FUNÇÂO PARA LISTAR OS TIPOS DE LABORATORIO
// function listaTipoLaboratorio(){
//     $query = "select * from TIPO_LABORATORIO";
//     $resultado = mysqli_query(buscaconexao(),$query);
//     while($tipoLaboratorio = mysqli_fetch_assoc($resultado)){
//           echo"<option value='".$tipoLaboratorio["ID"]."'>".$tipoLaboratorio["DESCRICAO"]."</option>";
//     }
// }





// //FUNÇÂO PARA LISTAR OS TIPOS DE INSUMOS
// function listaTipoInsumo(){
//     $query = "select * from TIPO_INSUMO";
//     $resultado = mysqli_query(buscaconexao(),$query);
//     while($tipoInsumo = mysqli_fetch_assoc($resultado)){
//           echo"<option value='".$tipoInsumo["ID"]."'>".$tipoInsumo["DESCRICAO"]."</option>";
//     }
    
// }
// //FUNÇÂO PARA LISTAR OS INSUMOS
// function listaInsumo(){
//     $query = "select * from INSUMO";
//     $resultado = mysqli_query(buscaconexao(),$query);
//     while($insumo = mysqli_fetch_assoc($resultado)){
//           echo"<option value='".$insumo["ID"]."'>".$insumo["DESCRICAO"]."</option>";
//     }
    
// }


// //FUNÇÂO PARA LISTAR OS TIPOS DE CURSO NOS CAMPOS DE SELEÇÃO 
// function listaTipoLaboratorio2($idSelecionado){
//     $op="";
//     $query2 = "SELECT * FROM TIPO_LABORATORIO";
//     $resultado2 = mysqli_query(buscaconexao(),$query2);
//     while($tipoLaboratorio2 = mysqli_fetch_assoc($resultado2)){
//         if($idSelecionado == $tipoLaboratorio2["ID"] ) {
//             $op .= "<option selected value='".$tipoLaboratorio2["ID"]."'>".$tipoLaboratorio2["DESCRICAO"]."</option>";
//         }else{
//             $op .= "<option value='".$tipoLaboratorio2["ID"]."'>".$tipoLaboratorio2["DESCRICAO"]."</option>";
//         }
        
//     }
//     return $op;
    
// }

