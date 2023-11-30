<?php
//Importação do cabeçalho
include "/xampp/htdocs/projeto_recomeco_wale/src/controller/header.php";

//Importação dos arquivos que contém as classes User e Database
include MODEL . "/user.php";
include MODEL . "/database.php";

//Importando arquivo que verifica se a sessão está "desligada".
//Caso esteja, redireciona o usuário para a página de login
//include CONTROLLER . "/session_off.php";

session_reset();
$u = $_SESSION["user"];

//var_dump($u);
?>

<style> 
    /* body{
        background-color: #828282;
        font-family: Arial, Helvetica, sans-serif;
    } */

    div {
        background-color: #ac9d4b;
        position: absolute;
        width: 350px;
        padding: 20px;
        text-align: center;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 15px;

    }
    input{
        padding: 5px;
        border: none;
        outline: none;
        font-size: 20px;
        background-color:black;
        color: #ac9d4b;
        border-radius: 10px;
    }

    button, input[type="submit"]{
        background-color:black;
        border: none;
        padding: 15px;
        width: 30%;
        border-radius: 10px;
        color:#ac9d4b;
        font-size: 15px;
    }

    button:hover{
        background-color: #FFFFFF;
        cursor: pointer;
    }

</style>

<!-- construindo perfil -->
<form action="#" method="get">
    <!-- Tabela para organizar o conteúdo -->
    <table>
        <!-- <tr> representa uma linha da tabela -->
        <tr>
            <!-- <td> representa uma célula da linha (coluna) -->
            <td><h1>Perfil</h1></td>
            <td width="250px"></td>
            <td>
                <img src="<?= $u->getPhoto() ?>" alt="imagem do perfil" width="100">
                <br>
                <input type="file" name="photo" id="photo">
            </td>
        </tr>

        <!-- dentro table criar usuário -->

        <tr>
            <td>
                <label for="user">Usuário</label>
                <br>
                <input type="text" name="user" id="user" value="<?=$u->getUser()?>">
            </td>
            <td>
                <label for="birth">Data de nascimento</label>
                <br>
                <input type="date" name="birth" id="birth" value="<?=$u->getBirth()?>">
            </td>
        </tr>

        <tr>
            <td>
                <label for="nome">Nome Completo</label>
                <br>
                <input type="text" name="user" id="user" value= "<?=$u->getFirstName()?> <?=$u->getLastName()?>">
            </td>
            <td>
                <label for="cnh">Número da cnh</label>
                <br>
                <input type="number" name="numberCnh" id="numberCnh" value= "<?=$u->getNumberCnh()?>">
            </td>
            <td>
                <label for="cep">Cep</label>
                <br>
                <input type="number" name="cep" id="cep"value= "<?=$u->getCep()?>">
            </td>
        </tr>

        <tr>
            <td>
                <label for="address">Endereço</label>
                <br>
                <input type="text" name="address" id="address"value= "<?=$u->getAddress()?>">
            </td>
            <td>
                <label for="number">Número</label>
                <br>
                <input type="number" name="number" id="number"value= "<?=$u->getNumber()?>">
            </td>
            <td>
                <label for="complement">Complemento</label>
                <br>
                <input type="complement" name="complement" id="complement"value= "<?=$u->getComplement()?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="city">Cidade</label>
                <br>
                <input type="city" name="city" id="city"value= "<?=$u->getCity()?>">
            </td>
            <td>
                <label for="user">Bairro</label>
                <br>
                <input type="text" name="text" id="text"value= "<?=$u->getNeighborhood()?>">
            </td>>
            </td>
            <td>
                <label for="text">Estado</label>
                <br>
                <select id="estado" name="state">

                <?php
                    $uf = $u->getState();
                    echo ($uf == null) 
                    ? "<option value=''>Selecione</option>" 
                    : "<option value='$uf'>$uf</option>"
                ?>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="EX">Estrangeiro</option>
                </select>   

            </td>
        </tr>
        <tr>
            <td>
            <tr>
                <td colspan=5>
                    <label for="desc">Descrição (bio)</label>
                    <br>
     <textarea name="desc" id="desc" cols="100" rows="3" placeholder="Fale sobre você" maxlength="255"><?=$u->getDesc()?></textarea>
                </td>
            </td>
            
        
        <tr>
           <br>
            <td>
                <h2>Sexo</h2>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="sex" id="male" value="male" <?=($u->getSex()=="male")?"checked":""?>>
                <label for="male">Masculino</label>
            </td>
        </tr>
        <td>
                <input type="radio" name="sex" id="female" value="female" <?=($u->getSex()=="female")?"checked":""?>>
                <label for="female">Feminino</label>

            </td>
            <td>
                <input type="checkbox" name="notify" id="notify" value="yes" <?=($u->getNotify()==1)?"checked":""?>>
                <label for="notify">Desejo receber notificações</label>
                <br><hr><br> 
                 
            </td>
        </tr>
            <td>
                <label for="phone">Telefone</label>
                <br>
                <!-- pattern cria um padrão de expressão de 0 até 9 -->
                <input type="tel" name="phone" id="phone" pattern="[0-9] {2} - [0-9] {9}"value= "<?=$u->getPhone()?>">
            </td>
            <td>
                <label for="email">E-mail</label>
                <br> 
                <input type="email" name="email" id="email"value= "<?=$u->getEmail()?>">
            </td>
            <td rowspan="2" style="text-align: center;">
            <button type="button" onclick="window.location.href='<?= ROOT ?>/src/controller/logout.php'"> Sair </button>
            </td>
        </tr>
        <tr>    
            <td>
                <label for="new-pass">Nova senha</label>
                <br>
                <input type="password" name="new-pass" id="new-pass">
            </td>
            <td>
                <label for="confirm-pass">Confirmar senha</label>
                <br>
                <input type="password" name="confirm-pass" id="confirm-pass">
            </td>
        </tr>
        <tr>
            <td colspan=5>
                <br>
                <a href="<?= ROOT ?>"><button>Salvar</button> </a>
                <a href="<?= ROOT ?>"><button>Limpar</button> </a>
                <a href="<?= ROOT ?>"><button>Próxima Página</button> </a>
                <br><br>
            </td>
        </tr>
    </table> 


</form>

<?php
//Importação do rodapé
include "/xampp/htdocs/projeto_recomeco_wale/src/controller/footer.php";
