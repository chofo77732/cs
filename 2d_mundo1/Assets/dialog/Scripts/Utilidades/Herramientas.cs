using UnityEngine;

public static class Herramientas {

    public static Vector2 ObtenerDireccion(Direccion direccion)
    {
        Vector2 nuevaDireccion = Vector2.zero;

        switch (direccion)
        {
            case Direccion.Arriba:
                nuevaDireccion = Vector2.up;
                break;
            case Direccion.Abajo:
                nuevaDireccion = Vector2.down;
                break;
            case Direccion.Izquierda:
                nuevaDireccion = Vector2.left;
                break;
            case Direccion.Derecha:
                nuevaDireccion = Vector2.right;
                break;
        }

        return nuevaDireccion;

    }
}