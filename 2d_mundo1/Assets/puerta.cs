using System;
using System.Linq;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.Assertions;
using UnityEngine.UI;

public class puerta : MonoBehaviour {

	public Text count_chest; 
	public Text count_items; 
	public GameObject mision_items;
    public string numero_tesoros;
    public string numero_items;
    public string nueva_escena;

    public GameObject puertaCerrada;
  	public GameObject puertaAbierta;

  	public GameObject panel;
	public Text mensaje;
	public Button btn_next;
	public GameObject menu;

	Button boton;
	GameObject actual_door;

 	int i = 0;
 	int m1=0;
	// Use this for initialization

 	// mision_text mt;
 	// Button btn1;
	void Start () {
		// mt = mision.GetComponent<mision_text>();
		// btn1 = boton.GetComponent<Button>();
		puertaCerrada.SetActive(true);
		puertaAbierta.SetActive(false);
		mision_items.SetActive(false);

		boton = btn_next.GetComponent<Button>();
		boton.onClick.AddListener(boton_next);
		// btn1.onClick.AddListener(TaskOnClick);


	}



void Update () {

if(count_items.text == numero_items){
	puertaCerrada.SetActive(false);
	puertaAbierta.SetActive(true);
	}
if(count_chest.text == numero_tesoros){
mision_items.SetActive(true);
}

}



void OnTriggerEnter2D(Collider2D col){
	i++;
	Debug.Log("toca puerta"+i);
	
	
		if(col.gameObject.tag == "Player"){		

			if(count_chest.text == numero_tesoros){

				 if(count_items.text == numero_items){

					SceneManager.LoadScene(nueva_escena);

				 }else{

				// m1++;
				// ventanaDialogo.SetActive(true);
				// menu.SetActive(false);
				// Time.timeScale = 0; 

				 	m1++;
			Debug.Log("puerta2");
			Time.timeScale = 0; 
			menu.SetActive(false);
			panel.SetActive(true);
			string msg = col.GetComponent<puerta_v2>().getMensaje_mision();
			actual_door = col.gameObject;
			mensaje.text = msg;

				 }

			}else{

			
			Debug.Log("puerta1");
			Time.timeScale = 0; 
			menu.SetActive(false);
			panel.SetActive(true);
			string msg = col.GetComponent<puerta_v2>().getMensaje_chest();
			actual_door = col.gameObject;
			mensaje.text = msg;

//Debug.Log("new num "+i);
				// campoDeTexto.text = string.Empty;
				// ventanaDialogo.SetActive(true);
				// menu.SetActive(false);
				// Time.timeScale = 0; 

				//mt.mostrar();

			
		}

	}



	}


int tama = 0;
public void boton_next(){
		if(actual_door){

			actual_door.GetComponent<puerta_v2>().boton_next();
			

			int tama_chest = actual_door.GetComponent<puerta_v2>().getTamaChest();
			int tama_mision = actual_door.GetComponent<puerta_v2>().getTamaMision();
			int index = actual_door.GetComponent<puerta_v2>().getIndex();
			int num_chest = actual_door.GetComponent<puerta_v2>().getnum_chest();
			int num_items = actual_door.GetComponent<puerta_v2>().getnum_items();
			

			Debug.Log(index+" - "+tama);
			if(m1==0){
				tama = tama_chest;
			}else{
				tama=tama_mision;
			}


			if(index < tama){

				if(m1==0){
					string mensaje_act = actual_door.GetComponent<puerta_v2>().getMensaje_chest();
					mensaje.text = mensaje_act;
					
				}else{
					string mensaje_act = actual_door.GetComponent<puerta_v2>().getMensaje_mision();
					mensaje.text = mensaje_act;
					
				}

					
					
				}
				// else if(chest == num_chest && item < num_items){

				// 	string mensaje_act = actual_door.GetComponent<puerta_v2>().getMensaje_mision();
				// 	mensaje.text = mensaje_act;
				// }else if(chest == num_chest && item == num_items){
					

				// }

				// }
			else{
				// actual_door.GetComponent<puerta_v2>().setIndex(0);
				// if(chest == num_chest && item < num_items){
				// 	tama=tama_mision;

				// }
				actual_door.GetComponent<puerta_v2>().setIndex(0);
				Time.timeScale = 1; 
				menu.SetActive(true);
				mensaje.text = string.Empty;
				panel.SetActive(false);
				
			}
		}
	}




}
