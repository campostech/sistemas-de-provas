<?php



// Cria as linhas com os dados do laboratorio
function listaInstrutor(){
    
    
//QUERY que será executada no bando de dados
    $query = "SELECT E.CODIGO AS CODIGO,E.FK_INSTRUTOR_CPF AS INSTRUTOR_CPF,E.CEP AS CEP,E.RUA AS RUA,E.BAIRRO AS BAIRRO, E.CIDADE AS CIDADE, E.UF AS ESTADO,E.NUMERO AS NUMERO,I.CPF AS CPF,I.RG as RG,I.NOME AS NOME,I.PERFIL AS PERFIL,I.EMAIL AS EMAIL,I.NUMERO_CNH AS CNH,I.TELEFONE AS TELEFONE,I.CELULAR AS CELULAR,I.TELEFONE AS TELEFONE,I.CELULAR AS CELULAR FROM ENDERECO AS E INNER JOIN INSTRUTOR AS I ON E.FK_INSTRUTOR_CPF =I.CPF";
    $resultado = mysqli_query(buscaconexao(),$query);
    
//Resultado da QUERY executada no bando de dados
    while($instrutor = mysqli_fetch_array($resultado)){
      
    // mysqli_fetch_assoc Transforma o resultado do select em um conjunto onde o dado que busta na tabela pode ser referênciado pelo nome da coluna.
        // Cria a LINHA  
   if($_SESSION['PERFIL'] == 1){ 
        echo "<!-- LINHA DO LABORATORIO -->
            <tr>
                <td>".$instrutor["CPF"]."</td>
                <td>".$instrutor["NOME"]."</td>
                <td class='text-center'>
                    <div class='list-icons'>
                        <div class='dropdown'>
                            <a href='#' class='list-icons-item' data-toggle='dropdown'>
                                <i class='icon-menu9'></i>
                            </a>

                            <div class='dropdown-menu dropdown-menu-right'>
                                <a href='#' data-toggle='modal' data-target='.bd-example-modal-xl".$instrutor['CPF']."' class='dropdown-item'><i class='icon-file-pdf'></i> Visualizar</a>
                                <a href='#' data-toggle='modal' data-target='.bd-example-modal-xl-2".$instrutor['CPF']."' class='dropdown-item'><i class='icon-file-excel'></i> Editar</a>
                                <a href='#' data-target='#modalExcluir'".$instrutor['CPF']."' data-toggle='modal' class='dropdown-item'><i class='icon-file-word'></i> Excluir</a>
                            </div>
                        </div>
                    </div>                 
                </td>
            </tr>  
                                    <div class='modal fade bd-example-modal-xl".$instrutor['CPF']."' tabindex='-1' role='dialog' aria-labelledby='myExtraLargeModalLabel' aria-hidden='true'>
                                      <div class='modal-dialog modal-xl' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLongTitle'>Instrutor</h5>
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
                                                            <input disabled type='text' value='".$instrutor['NOME']."' class='form-control' id='nome' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='cpf'>CPF</label>
                                                            <input disabled value='".$instrutor['CPF']."' type='text' class='form-control' id='cpf' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='rg'>RG</label>
                                                            <input disabled value='".$instrutor['RG']."' type='text' class='form-control' id='rg' placeholder='Example input placeholder'>
                                                        </div>     
                                                        <div class='form-group col-md-6'>
                                                            <label for='nome_pai'>EMAIL</label>
                                                            <input disabled value='".$instrutor['EMAIL']."' type='email' class='form-control' id='email' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='nome_mae'>CELULAR</label>
                                                            <input disabled value='".$instrutor['CELULAR']."' type='text' class='form-control' id='celular' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='telefone'>TELEFONE</label>
                                                            <input disabled value='".$instrutor['TELEFONE']."' type='text' class='form-control' id='telefone' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='naturalidade'>NÚMERO CNH</label>
                                                            <input disabled value='".$instrutor['CNH']."' type='text' class='form-control' id='cnh' placeholder='Example input placeholder'>
                                                        </div> 
                    
                                                    </div>
                                                    <hr>
                                                    <h2>Endereço</h2>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='cep'>CEP</label>
                                                            <input disabled value='".$instrutor['CEP']."' type='text' class='form-control' id='cep' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='rua'>RUA</label>
                                                            <input disabled value='".$instrutor['RUA']."' type='text' class='form-control' id='rua' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='bairro'>BAIRRO</label>
                                                            <input disabled value='".$instrutor['BAIRRO']."' type='text' class='form-control' id='bairro' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='cidade'>CIDADE</label>
                                                            <input disabled value='".$instrutor['CIDADE']."' type='text' class='form-control' id='cidade' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='estado'>ESTADO</label>
                                                            <input disabled value='".$instrutor['ESTADO']."' type='text' class='form-control' id='estado' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='numero'>NUMERO</label>
                                                            <input disabled value='".$instrutor['NUMERO']."' type='text' class='form-control' id='numero' placeholder='Example input placeholder'>
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
                    
                                    
                    
                                    <div class='modal fade bd-example-modal-xl-2".$instrutor['CPF']."' tabindex='-1' role='dialog' aria-labelledby='myExtraLargeModalLabel' aria-hidden='true'>
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
                                                            <input  type='text' value='".$instrutor['NOME']."' class='form-control' id='nome' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='cpf'>CPF</label>
                                                            <input  value='".$instrutor['CPF']."' type='text' class='form-control' id='cpf' placeholder='Example input placeholder'>
                                                        </div>    
                                                        <div class='form-group col-md-6'>
                                                            <label for='rg'>RG</label>
                                                            <input  value='".$instrutor['RG']."' type='text' class='form-control' id='rg' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='email'>EMAIL</label>
                                                            <input  value='".$instrutor['EMAIL']."' type='email' class='form-control' id='email' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='sexo'>CELULAR</label>
                                                            <input  value='".$instrutor['CELULAR']."' type='text' class='form-control' id='celular' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='naturalidade'>TELEFONE</label>
                                                            <input  value='".$instrutor['TELEFONE']."' type='text' class='form-control' id='telefone' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='cnh'>NÚMERO CNH</label>
                                                            <input  value='".$instrutor['CNH']."' type='text' class='form-control' id='cnh' placeholder='Example input placeholder'>
                                                        </div>
                                                        
                                                    </div>
                                                    <hr>
                                                    <h2>Endereço</h2>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-6'>
                                                            <label for='cep'>CEP</label>
                                                            <input  value='".$instrutor['CEP']."' type='text' class='form-control' id='cep' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='rua'>RUA</label>
                                                            <input  value='".$instrutor['RUA']."' type='text' class='form-control' id='rua' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='bairro'>BAIRRO</label>
                                                            <input  value='".$instrutor['BAIRRO']."' type='text' class='form-control' id='bairro' placeholder='Example input placeholder'>
                                                        </div>  
                                                        <div class='form-group col-md-6'>
                                                            <label for='cidade'>CIDADE</label>
                                                            <input  value='".$instrutor['CIDADE']."' type='text' class='form-control' id='cidade' placeholder='Example input placeholder'>
                                                        </div>
                                                        <div class='form-group col-md-6'>
                                                            <label for='estado'>ESTADO</label>
                                                            <input  value='".$instrutor['ESTADO']."' type='text' class='form-control' id='estado' placeholder='Example input placeholder'>
                                                        </div> 
                                                        <div class='form-group col-md-6'>
                                                            <label for='numero'>NUMERO</label>
                                                            <input  value='".$instrutor['NUMERO']."' type='text' class='form-control' id='numero' placeholder='Example input placeholder'>
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

