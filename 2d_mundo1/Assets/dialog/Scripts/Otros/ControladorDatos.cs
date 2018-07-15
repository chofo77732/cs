using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ControladorDatos : MonoBehaviour {

    public static ControladorDatos Instancia { get; private set; }

    private Datos datos = new Datos();

    private void Awake()
    {
        Singleton();
    }

    private void Singleton()
    {
        if (Instancia != null && Instancia != this)
        {
            Destroy(gameObject);
        }
        else
        {
            Instancia = this;
            DontDestroyOnLoad(gameObject);
        }
    }

    public void AniadirLogro(Logro logro)
    {
        if (!datos.logrosConseguidos.Contains(logro))
        {
            Debug.Log(string.Concat("Añadido logro ", logro.ToString()));
            datos.logrosConseguidos.Add(logro);
        }            
        else
            Debug.LogWarning(string.Concat("El logro ", logro.ToString(), " ya había sido añadido"));
    }

    public bool ContieneLogro(Logro logro)
    {
        if (datos.logrosConseguidos.Contains(logro))
            return true;
        else
            return false;
    }

    public void AniadirNuevoPokemonCapturado(Pokemon pokemon)
    {
        if (datos.equipoPokemon.Count > 6)
        {
            AlmacenarPokemonEnPC(pokemon);
        }
        else
        {
            AniadirPokemonAlEquipo(pokemon);
        }
    }

    private void AniadirPokemonAlEquipo(Pokemon pokemon)
    {
        datos.equipoPokemon.Add(pokemon);
    }

    private void AlmacenarPokemonEnPC(Pokemon pokemon)
    {
        datos.pokemonAlmacenadosEnPC.Add(pokemon);
    }

    public bool SacarPokemonDelPC(Pokemon pokemon)
    {
        if (datos.equipoPokemon.Count > 6)
        {
            return false;
        }
        else
        {
            datos.pokemonAlmacenadosEnPC.Remove(pokemon);
            AniadirPokemonAlEquipo(pokemon);
            return true;
        }
    }

    public bool DejarPokemonDelEquipoEnPC(Pokemon pokemon)
    {
        if(datos.equipoPokemon.Count  < 2)
        {
            return false;
        }
        else
        {
            datos.equipoPokemon.Remove(pokemon);
            datos.pokemonAlmacenadosEnPC.Add(pokemon);
            return true;
        }
    }

    public void AniadirObjetoAlInventario(ItemID item, int cantidad)
    {

        Debug.Log(string.Concat("Añadido al inventario el objeto ", item.ToString(), " x ", cantidad));
        int cantidadActual = 0;
        if(datos.inventario.IntentarObtenerValor(item, out cantidadActual))
        {
            cantidadActual += cantidad;
            datos.inventario.CambiarValor(item, cantidadActual);
        }
        else
        {
            datos.inventario.Aniadir(item, cantidad);
        }
    }


}
