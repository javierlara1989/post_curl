<!DOCTYPE html>
<html>
<body>
<h3>Formulario de registro</h3>
<form name="form" method="post">
    <table>
    <tr>
        <td>Nombre del paciente</td>
        <td><input type="text" name="first_name"></td>
    </tr>
    <tr>
        <td>Apellido del paciente</td>
        <td><input type="text" name="last_name"></td>
    </tr>
        <td>Rut del paciente</td>
        <td><input type="text" name="paciente_rut_c" size="15"><input type="text" name="paciente_rut_v" size="3"></td>
    <tr>
        <td>Numero de telefono</td>
        <td><input type="text" name="phone_home"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td>DV del paciente</td>
        <td><input type="text" name="paciente_dv"></td>
    </tr>
    <tr>
        <td>Nombre del medico</td>
        <td><input type="text" name="medico_name"></td>
    </tr>
    <tr>
        <td>Rut del medico</td>
        <td><input type="text" name="medico_rut" size="15"><input type="text" name="medico_rut_v" size="3"></td>
    </tr>
    <tr>
        <td>Folio del medico</td>
        <td><input type="text" name="medico_folio"></td>
    </tr>
    <tr>
        <td>DV del medico</td>
        <td><input type="text" name="medico_dv"></td>
    </tr>
    <tr>
        <td>Medicamento</td>
        <td><input type="text" name="email" value="Entocort" readonly></td>
    </tr>
    <tr>
        <td>Enviar formulario</td><td><input type="submit" name="submit" value="Registrar"></td>
    </tr>

<?php
    if(isset($_POST['submit'])) {
        $url=YOUR_URL';
        $PostFields = array(
            "entryPoint"=>"CreateContact",
            "first_name"=>ucwords(strtolower($_POST['first_name'])),
            "last_name"=>ucwords(strtolower($_POST['last_name'])),
            "paciente_rut_c"=>$_POST['paciente_rut_c'].'-'.$_POST['paciente_rut_v'],
            "phone_home"=>$_POST['phone_home'],
            "email"=>ucwords(strtolower($_POST['email'])),
            "paciente_dv_c"=>$_POST['paciente_dv'],
            "medico_rut_c"=>$_POST['medico_rut'].'-'.$_POST['medico_rut_v'],
            "medico_dv_c"=>$_POST['medico_dv'],
            "medico_full_name_c"=>$_POST['medico_name'],
            "folio_numero_c"=>$_POST['medico_folio'],
            "tareas_medicamento_c"=>"entocort"
        );

        $Curl_Session=curl_init($url);
        curl_setopt($Curl_Session, CURLOPT_POST, 1);
        curl_setopt($Curl_Session, CURLOPT_POSTFIELDS, $PostFields);
        curl_setopt($Curl_Session, CURLOPT_RETURNTRANSFER, 1);
        $result=curl_exec($Curl_Session);
        curl_close($Curl_Session);
        echo '<td>'.$result.'</td>';
    }
?>
    </table>
</form>
</body>
</html>
