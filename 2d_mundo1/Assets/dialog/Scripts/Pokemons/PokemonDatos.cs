using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[CreateAssetMenu]
public class PokemonDatos : ScriptableObject {

    public PokemonID pokemonID;
    public Sprite sprite;
    [Range(1, Ajustes.estadisticasMaximasPokemon)]
    public int saludMaxima;
    [Range(1, Ajustes.estadisticasMaximasPokemon)]
    public int ataqueFisicoMaximo;
    [Range(1, Ajustes.estadisticasMaximasPokemon)]
    public int defensaFisicaMaxima;
    [Range(1, Ajustes.estadisticasMaximasPokemon)]
    public int ataqueMagicoMaximo;
    [Range(1, Ajustes.estadisticasMaximasPokemon)]
    public int defensaMagicaMaxima;
    [Range(1, Ajustes.estadisticasMaximasPokemon)]
    public int velocidadMaxima;
    public List<AtaqueReferencia> ataques;

}
