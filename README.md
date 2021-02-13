# Atlas

Use your laravel translations into your javascript frameworks in am very simple way.

# How to use

1. composer require mariojgt/atlas

2. ```html
   // Once you install the package you can use like this
   // THis is the component version
   // make sure you add the js file before you javascripts
    <x-atlas::atlas_guide/>
   // if you don,t want to use the component you can this way, they are the same
   <script src="/atlas/translation.js"></script>
   
```
   
3. Now you can use in your javascript like this

4. ```html
   <script>
       // all you translation will be avaliable from here
       // Note that if the translation is inside a folder under the laravel resouces/lang Atlas will use only the file name
       // for example you have you translation in a folder "lang/end/users/user.php" you can acess in atlas like this
       // console.log(atlas.user.name); //example
       console.log(atlas);
   </script>
   ```

   ### Notes
   
   Make sure you include the atlas file before you javascript so is available in the other scripts.



### You can also generate a fidical js version like this

```php
use Mariojgt\Atlas\Controllers\AtlasController;
$atlas = new AtlasController();
$atlas->makeFile(); // That will create example en.js ru.js at the laravel path "\public\vendor\atlas\en.js"

```



## How does it work ?

Atlas will simple loop your selected laravel language and cache that file once you access in that route /atlas/translation.js we going to load that translation into the browser window making available in the javascript, the translation is generated based in your laravel selected translation so it will change according to the selected option, if the translations is not being update you need to clear the laravel cache because atlas assume you will cache forever the translations.