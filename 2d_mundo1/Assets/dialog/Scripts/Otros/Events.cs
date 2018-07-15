using UnityEngine.UI;
using System.Collections.Generic;
using UnityEngine;

public class EventoBase
{
    public string nombreEvento;
    public EventoBase() { nombreEvento = this.GetType().Name; }
}

//MOVER PERSONAJE DE POSICIÓN
public class EventoTeletransportarse : EventoBase
{
    public Vector2 Destino { get; private set; }
    public Personaje Personaje { get; private set; }
    public Direccion DireccionMirar { get; private set; }

    public EventoTeletransportarse(Vector2 destino, Personaje personaje, Direccion direccion)
    {
        Destino = destino;
        Personaje = personaje;
        DireccionMirar = direccion;
    }
}
public class EventoTeletransportarseCentroPokemon : EventoBase
{
    public Personaje Personaje { get; private set; }

    public EventoTeletransportarseCentroPokemon(Personaje personaje)
    {
        Personaje = personaje;
    }
}

//SISTEMA DE DIÁLOGOS
public class EventoMostrarMensaje : EventoBase
{
    public Conversacion Mensaje { get; private set; }

    public EventoMostrarMensaje(Conversacion mensaje)
    {
        Mensaje = mensaje;
    }
}
public class EventoItemConseguido : EventoBase
{
    public ItemID itemID { get; private set; }
    public int cantidad { get; private set; }

    public EventoItemConseguido(ItemID itemID, int cantidad)
    {
        this.itemID = itemID;
        this.cantidad = cantidad;
    }
}