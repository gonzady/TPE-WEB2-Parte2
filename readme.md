Método GET:

/api/weapons -> trae en orden de id TODOS los elementos de la base de datos
---
/api/weapons/?sort=*campo*&&order=*asc/desc* -> trae en orden ascendente o descendente todos los elementos ordenados según el campo insertado. 
Ejemplo: /api/weapons/?sort=weapon_name&&order=asc *trae todas las armas ordenads alfabeticamente de la A a la Z según sus nombres*
Opciones de sort: weapon_name, id_categorie, reach, bullets, price, damage.
Opciones de order: asc, desc.
---
/api/weapons/?id_categorie=*numero* -> trae los elementos de la base de datos de la categoria introducida.
Ejemplo: /api/weapons/?id_categorie=3 *trae todas las armas de categoría 3 (rifles)*
Opciones: 1,2,3,4
---
/api/weapons/:ID -> trae el elemento de la base de datos con la id introducida (si existe).
Ejemplo: /api/weapons/5 *trae el arma con id=5*

----------------

Método DELETE:

/api/weapons/:ID -> elimina el elemento del la base de datos con la id introducida (si existe).
Ejemplo: /api/weapons/7 *elimina el arma con id=7*

----------------

Método PUT:

/api/weapons/:ID -> edita los valores del elemento con el id introducido. Dichos valores se editan a través del body.
Ejemplo:  /api/weapons/4 *edita el arma con id=4*

*esto va en el body*
{
        "weapon_name": "*nuevo nombre*",
        "id_categorie": *numero de categoría nuevo*,
        "price": *nuevo precio*,
        "damage": *nuevo valor de daño*,
        "bullets": *nueva cantidad de valas por cagador*,
        "reach": *nuevo alcance efectivo del arma*
    }

----------------

Método POST:

/api/weapons -> inserta en la base de datos un nuevo elemento. Puede no insertarse con id (la base de datos le asignará uno).

*esto va en el body*
{
        "weapon_name": "*nuevo nombre*",
        "id_categorie": *numero de categoría*,
        "price": *precio*,
        "damage": *daño*,
        "bullets": *cantidad de valas por cagador*,
        "reach": *alcance efectivo del arma*
    }