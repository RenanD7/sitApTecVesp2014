<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('pessoa/atualizar', 'id="form-pessoas'); ?>
 
	<input type="hidden" name="id" value="<?php echo $dados_pessoa[0]->idUsuario; ?>"/>
 
	<label for="nome">Nome:</label><br/>
	<input type="text" name="nome" value="<?php echo $dados_pessoa[0]->nome; ?>"/>
	<div class="error"><?php echo form_error('nome'); ?></div>
        
        <label for="senha">Senha:</label><br/>
        <input type="password" name="senha" value="<?php echo $dados_pessoa[0]->senha; ?>"/>
	<div class="error"><?php echo form_error('senha'); ?></div>
 
	<label for="email">Email:</label><br/>
        <input type="email" name="email" value="<?php echo $dados_pessoa[0]->email; ?>"/>
	<div class="error"><?php echo form_error('email'); ?></div>
        
        <label for="foto">Foto:</label><br/>
	<input type="text" name="foto" value="<?php echo $dados_pessoa[0]->foto; ?>"/>
	<div class="error"><?php echo form_error('foto'); ?></div>
        
        <label for="telefone">Telefone:</label><br/>
        <input type="tel" name="telefone" value="<?php echo $dados_pessoa[0]->telefone; ?>"/>
	<div class="error"><?php echo form_error('telefone'); ?></div>
 
	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>
</body>
</html>