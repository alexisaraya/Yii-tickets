#Requeriments

Twitter Bootstrap extension for Yii. [getyiistrap](http://getyiistrap.com/)


###How to configure the application

Yii-tickets is a module  for Yii 1.1.5 and up.

This version it's a fork from [Yii-tickets](https://github.com/zloyded/Yii-tickets) 

####Using Module 
To use a module, first place the module directory under modules of the application base directory. 

<pre><code>
return array(

   'modules'=>array('tickets',...),
  
);
</pre></code>

####Access Module 
To access a controller action in a child module, we should use the route
 
 http://www.example.com/index.php?r=ticket/ticket/index


