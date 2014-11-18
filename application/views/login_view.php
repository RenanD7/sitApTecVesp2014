<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Login do Usuario</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 </head>
 <body>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
     <label for="nome">Nome:</label>
     <input type="text" size="20" id="nome" name="nome"/>
     <br/>
     <label for="senha">Senha:</label>
     <input type="password" size="20" id="senha" name="senha"/>
     <br/>
     <input type="submit" value="Efetuar Login"/>
   </form>
 </body>
</html>