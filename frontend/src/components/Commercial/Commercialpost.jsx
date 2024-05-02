import React, { useState } from 'react';
import axios from 'axios';

function CommercialPost() {
    const [values, setValues] = useState({
        CIN: "",
        Nom: "",
        Prenom: "",
        Sexe: "",
        DateNaissance: "",
        Tel: "",
        Adresse: "",
        Ville:"",
        id_societe:0
    });

    const [error, setError] = useState("");

    const handleChange = (e) => {
        const { name, value } = e.target;
        setValues({ ...values, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('http://localhost:8000/api/commercials', values)
            .then(res => {
                console.log(res);
            })
            .catch(err => {
                if (err.response && err.response.data && err.response.data.errors) {
                    const errorMessage = Object.values(err.response.data.errors)[0][0];
                    setError(errorMessage);
                } else {
                    setError("An error occurred. Please try again later.");
                }
            });
    };

    return (
        <form onSubmit={handleSubmit}>
            {error && <div style={{ color: 'red' }}>{error}</div>}

            <div>
                <label htmlFor="CIN">CIN:</label>
                <input type="text" id="CIN" name="CIN" value={values.CIN} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="Nom">Nom:</label>
                <input type="text" id="Nom" name="Nom" value={values.Nom} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="Prenom">Prenom:</label>
                <input type="text" id="Prenom" name="Prenom" value={values.Prenom} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="Sexe">Sexe:</label>
                <input type="text" id="Sexe" name="Sexe" value={values.Sexe} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="DateNaissance">DateNaissance:</label>
                <input type="date" id="DateNaissance" name="DateNaissance" value={values.DateNaissance} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="Tel">Tel:</label>
                <input type="text" id="Tel" name="Tel" value={values.Tel} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="Adresse">Adresse :</label>
                <input type="text" id="Adresse" name="Adresse" value={values.Adresse} onChange={handleChange} />
            </div>
            <div>
            <label htmlFor="Ville">Ville :</label>
                <input type="text" id="Ville" name="Ville" value={values.Ville} onChange={handleChange} />
            </div>
            <div>
            <label htmlFor="id_societe">id_societe :</label>
                <input type="number" id="id_societe" name="id_societe" value={values.id_societe} onChange={handleChange} />
            </div>
            <button type="submit">Envoyer</button>
        </form>
    )
    
     

}

export default CommercialPost;
