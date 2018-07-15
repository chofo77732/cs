using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;
using UnityEngine.Assertions;

public class pausa : MonoBehaviour {

	public GameObject ventanaDialogo;
    public Text campoDeTexto;   
    int i = 0;

	public void cambiarEscena(string name){
		SceneManager.LoadScene(name);
	}

	public void cambiarMenu(GameObject menu){
		menu.SetActive(true); 
	}

	public void hideMenu(GameObject menu){
		menu.SetActive(false); 
	}

	public void pause(){
		Time.timeScale = 0; 
		Debug.Log ("pausa");
	}

	public void conti(){
		Time.timeScale = 1; 
	}

	public void aqui(){
		
		/*
		if(i==0){
				i++;
				ventanaDialogo.SetActive(true);
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = "Remplazo de texto";
			 }else if(i==1){
				i++;
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = "hola k ase";
			 }else if(i==2){
			 	i++;
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = "Remplazo de texto 2";
			 }else if(i==3){
			 	i++;
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = "Hola mundo :3";
			 }else if(i==4){
			 	i=0;
				campoDeTexto.text = string.Empty;
				ventanaDialogo.SetActive(false);
			 }
			 */
			 i++;
			 //Debug.Log ("estoy vivo "+ i);
	}

}
