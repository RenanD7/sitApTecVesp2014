<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
        <script src="<?php echo base_url(); ?>view/renderizarUpload.php"></script>
        <script src="/ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="/upload/jquery.uploadify-3.1.min.js"></script>
    </head>
    <body>
        <?php echo form_open('usuarios/inserir', 'id="form-pessoas"'); ?>
        <label for="nome">Nome:</label><br/>
        <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
        <div class="error"><?php echo form_error('nome'); ?></div>

        <label for="nome">Senha:</label><br/>
        <input type="password" name="senha" value="<?php echo set_value('senha'); ?>"/>
        <div class="error"><?php echo form_error('senha'); ?></div>

        <label for="email">Email:</label><br/>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
        <div class="error"><?php echo form_error('email'); ?></div>

        <label for="foto">Foto:</label><br/>
        <input type="text" name="foto" value="<?php echo set_value('foto'); ?>"/>
        <div class="error"><?php echo form_error('foto'); ?></div>

        <label for="telefone">Telefone:</label><br/>
        <input type="tel" name="telefone" value="<?php echo set_value('telefone'); ?>"/>
        <div class="error"><?php echo form_error('telefone'); ?></div>

        <input type="submit" name="cadastrar" value="Cadastrar" />
        <?php echo form_close(); ?>

        <!-- Lista as Pessoas Cadastradas -->
        <div id="grid-pessoas">
            <ul>
                <?php foreach ($usuarios as $usuario): ?>
                    <li>
                        <a title="Deletar" href="<?php echo base_url() . 'usuarios/deletar/' . $usuario->idUsuario; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/images/lixo.png"/></a>
                        <span> - </span>
                        <a title="Editar" href="<?php echo base_url() . 'usuarios/editar/' . $usuario->idUsuario; ?>"><?php echo $usuario->nome; ?></a>
                        <span> - </span>
                        <span><?php echo $usuario->email; ?></span>
                        <span> - </span>
                        <span><?php echo $usuario->senha; ?></span>
                        <span> - </span>
                        <span><img src="<?php echo $usuario->foto; ?>"</span>
                        <span> - </span>
                        <span><?php echo $usuario->telefone; ?></span>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- Fim Lista -->
    </body>
</html>