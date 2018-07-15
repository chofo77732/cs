using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class Controlador_menu : MonoBehaviour {

	
	public void cambiarEscena(string name){
		SceneManager.LoadScene(name);
	}

	public void cambiarMenu(GameObject menu){
		menu.SetActive(true); 
	}

	public void hideMenu(GameObject menu){
		menu.SetActive(false); 
	}

}