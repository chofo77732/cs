﻿using UnityEngine;

// Add an entry to the Assets menu for creating an asset of this type
[CreateAssetMenu()]
public class Ajustes : ScriptableObject
{
    [Range(0.3f, 2f)]
    public float velocidadAndar = 0.5f;
    [Range(0.5f, 2f)]
    public float velocidadCorrer = 0.8f;
    public float tamanioCasilla = 0.16f;
    public KeyCode teclaCorrer = KeyCode.LeftShift;
    public string tagInteraccion = "Interactivo";
    public KeyCode teclaInteractuar = KeyCode.Space;
    public LayerMask layerColision;

    //CONSTANTES
    public const int estadisticasMaximasPokemon = 255;
    public const int poderMaximoAtaquePokemon = 120;
    public const int usosMaximoAtaquesPokemon = 40;

    private static Ajustes _instancia;

    public static Ajustes Instancia
    {
        get
        {
            if (_instancia == null)
                _instancia = (Ajustes)Resources.Load("Ajustes");
            return _instancia;
        }
    }

}