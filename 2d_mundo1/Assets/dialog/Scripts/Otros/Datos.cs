using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[System.Serializable]
public class Datos {

    public List<Logro> logrosConseguidos = new List<Logro>();
    //Clase Personalizada para poder guardar diccionarios en Json
    public CustomDiccionario<ItemID, int> inventario = new CustomDiccionario<ItemID, int>();
    //Clase Personalizada para poder guardar diccionarios en Json
    public CustomDiccionario<PokemonID, PokedexTipoAvistamiento> pokedex = new CustomDiccionario<PokemonID, PokedexTipoAvistamiento>();
    public Vector2 ultimaPosicion;
    public List<Pokemon> equipoPokemon = new List<Pokemon>();
    public List<Pokemon> pokemonAlmacenadosEnPC = new List<Pokemon>();
}
