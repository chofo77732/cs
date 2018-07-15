using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[System.Serializable]
public class Pokemon {

    public PokemonID pokemonID;
    [Range(1,100)]
    public int nivel;
    [HideInInspector]
    public float calidadDelPokemon = 1;
    [HideInInspector]
    public int salud;
}
