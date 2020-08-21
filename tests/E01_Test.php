<?php require_once 'PruebasHTML.php';class E01_Test extends PruebasHTML{const DIR='E01'.DIRECTORY_SEPARATOR;const ARCHIVO=self::DIR.'index.html';public function testSolicionCorrecta(){$hoja_estilos=$this->root.self::DIR.'estilos.css';$csstidy=$this->root.'csstidy/class.csstidy.php';$this->assertFileExists($hoja_estilos,"No existe el archivo $hoja_estilos");$file=file($hoja_estilos);$count=count($file);$this->assertGreaterThan(0,$count,'El archivo '.$hoja_estilos.' está vacío');$this->assertFileExists($csstidy,"No existe el archivo $csstidy");require_once $csstidy;$codigo=file_get_contents($hoja_estilos);$tidy=new csstidy();$tidy->set_cfg('compress_colors',false);$tidy->set_cfg('compress_font-weight',false);$tidy->set_cfg('merge_selectors',1);$tidy->parse($codigo);$this->assertNotEmpty($tidy->css,'No se pudo procesar el archivo estilos.css');$this->assertIsArray($tidy->css,'No se pudo procesar el archivo estilos.css');$lote1=false;$lote2=false;$lote3=false;$lote1_fondo=false;$lote2_fondo=false;$lote3_fondo=false;$hombres=false;$hombres_color=false;$mujeres=false;$mujeres_color=false;$familias=false;$familias_subrayado=false;$menores=false;$menores_capitalizado=false;$h1=false;$h1_color=false;$h1_alineacion=false;$h1_text_shadow=false;$p=false;$p_uppercase=false;$familia_casa_2=false;$familia_casa_2_text_align=false;$visitantes_casa_2=false;$visitantes_casa_negritas=false;$casa2_no_familia=false;$casa2_no_familia_italicas=false;$casa1_hombres_visitantes=false;$casa1_hombres_visitantes_size=false;$casa3_mujeres=false;$casa3_mujeres_separacion=false;$pointer=false;$rota=false;$jessica=false;$antonieta=false;foreach($tidy->css as $selectores){foreach($selectores as $selector=>$propiedades){switch(strtolower(trim($selector))){case '#lote1':$lote1=true;break;case '#lote2':$lote2=true;break;case '#lote3':$lote3=true;break;case 'h1':$h1=true;break;case 'p':$p=true;break;case '.hombre':$hombres=true;break;case '.mujer':$mujeres=true;break;case '.familia':$familias=true;break;case '.menor':$menores=true;break;case '#casa2 .familia':$familia_casa_2=true;break;case '#casa2 .familia .visita':case '#casa2 .visita':case '#casa2 > .familia > .visita':case '#casa2>.familia>.visita':$visitantes_casa_2=true;break;case '#casa2 > p':case '#casa2>p':$casa2_no_familia=true;break;case '#casa1 .visita .hombre':case '#casa1 > .visita > .hombre':case '#casa1>.visita>.hombre':case '#casa1 > .visita .hombre':case '#casa1>.visita .hombre':case '#casa1 .visita > .hombre':case '#casa1 .visita>.hombre':$casa1_hombres_visitantes=true;break;case '#casa3 > .familia > .mujer':case '#casa3>.familia>.mujer':case '#casa3>.familia .mujer':case '#casa3 .familia>.mujer':case '#casa3 .familia .mujer':$casa3_mujeres=true;break;case '#casa2 .visita p:nth-child(2)':case '#casa2 .visita :nth-child(2)':case '#casa2 .visita p:last-child':case '#casa2 .visita :last-child':$jessica=true;break;case '#casa3 .familia p:nth-child(1)':case '#casa3 .familia :nth-child(1)':case '#casa3 .familia p:first-child':case '#casa3 .familia :first-child':$antonieta=true;break;}foreach($propiedades as $propiedad=>$valor){switch(strtolower($propiedad)){case 'text-shadow':if($h1){$h1_text_shadow=true;}break;case 'text-align':if($h1&&strtolower($valor)=='center'){$h1_alineacion=true;}if($familia_casa_2&&strtolower($valor)=='right'){$familia_casa_2_text_align=true;}break;case 'text-transform':if($p&&strtolower($valor)=='uppercase'){$p_uppercase=true;}if($menores&&strtolower($valor)=='capitalize'){$menores_capitalizado=true;}break;case 'color':if($h1&&strtolower($valor)=='#b29d8e'){$h1_color=true;}if($hombres&&strtolower($valor)=='#0000ff'){$hombres_color=true;}if($mujeres&&strtolower($valor)=='#ff66ff'){$mujeres_color=true;}break;case 'background':case 'background-color':if($lote1&&strtolower($valor)=='#ffefe4'){$lote1_fondo=true;}if($lote2&&strtolower($valor)=='#7cafb2'){$lote2_fondo=true;}if($lote3&&strtolower($valor)=='#e4fdff'){$lote3_fondo=true;}break;case 'text-decoration':if($familias&&strtolower($valor)=='underline'){$familias_subrayado=true;}break;case 'font-weight':if($visitantes_casa_2&&strtolower($valor)=='bold'){$visitantes_casa_negritas=true;}break;case 'font-style':if($casa2_no_familia&&strtolower($valor)=='italic'){$casa2_no_familia_italicas=true;}break;case 'font-size':if($casa1_hombres_visitantes&&strtolower($valor)=='22px'){$casa1_hombres_visitantes_size=true;}break;case 'letter-spacing':if($casa3_mujeres&&strtolower($valor)=='10px'){$casa3_mujeres_separacion=true;}break;case 'cursor':if($jessica&&strtolower($valor)=='pointer'){$pointer=true;}break;case 'transform':if($antonieta&&strtolower($valor)=='rotate(5deg)'){$rota=true;}break;}}}}$this->assertTrue($lote1,'Falta el selector para ubicar lote 1');$this->assertTrue($lote2,'Falta el selector para ubicar lote 2');$this->assertTrue($lote3,'Falta el selector para ubicar lote 3');$this->assertTrue($lote1_fondo,'Color de fondo para el lote 1 faltante o es incorrecto');$this->assertTrue($lote2_fondo,'Color de fondo para el lote 2 faltante o es incorrecto');$this->assertTrue($lote3_fondo,'Color de fondo para el lote 3 faltante o es incorrecto');$this->assertTrue($h1,'Falta el selector para ubicar los encabezados nivel 1');$this->assertTrue($h1_color,'Color de fuente para los encabezados nivel 1 faltante o es incorrecto');$this->assertTrue($h1_alineacion,'Alineación para los encabezados nivel 1 faltante o es incorrecto');$this->assertTrue($h1_text_shadow,'Falta el efecto de sombra de texto de los encabezados nivel 1');$this->assertTrue($p,'Falta el selector para ubicar a todas las peronas');$this->assertTrue($p_uppercase,'Falta convertir a mayúsculas el texto de todas las personas');$this->assertTrue($hombres,'Falta el selector para ubicar a los hombres');$this->assertTrue($mujeres,'Falta el selector para ubicar a las mujeres');$this->assertTrue($hombres_color,'Color de fuente para hombres faltante o es incorrecto');$this->assertTrue($mujeres_color,'Color de fuente para mujeres faltante o es incorrecto');$this->assertTrue($familias,'Falta el selector para ubicar a las familias');$this->assertTrue($familias_subrayado,'Estilo subrayado no aplicado correctamente a las familias');$this->assertTrue($menores,'Falta el selector para ubicar a los menores');$this->assertTrue($menores_capitalizado,'Estilo capitalizado de fuente no aplicado correctamente a los menores');$this->assertTrue($familia_casa_2,'Falta el selector para ubicar a la familia de la casa 2');$this->assertTrue($familia_casa_2_text_align,'La alineación de texto de la familia de la casa 2 es incorrecta');$this->assertTrue($visitantes_casa_2,'Falta el selector para ubicar a los visitantes de la casa 2');$this->assertTrue($visitantes_casa_negritas,'Estilo de negritas para los visitantes de la casa 2 es incorrecto');$this->assertTrue($casa2_no_familia,'Falta el selector para ubicar a los habitantes de la casa 2 que no son familia');$this->assertTrue($casa2_no_familia_italicas,'Estilo de itálicas para habitantes de la casa 2 es incorrecto');$this->assertTrue($casa1_hombres_visitantes,'Falta el selector para ubicar a los visitante que son hombres de la casa 1');$this->assertTrue($casa1_hombres_visitantes_size,'Tamaño de fuente a los visitantes hombres de la casa 1 es incorrecto');$this->assertTrue($casa3_mujeres,'Falta el selector para ubicar a las mujeres de la casa 3');$this->assertTrue($casa3_mujeres_separacion,'Separación entre caracteres de las mujeres en casa 3 es incorrecta');$this->assertTrue($pointer,'Cursor tipo apuntador no establecido o es incorrecto');$this->assertTrue($rota,'Efecto de rotación no establecido o es incorrecto');}}