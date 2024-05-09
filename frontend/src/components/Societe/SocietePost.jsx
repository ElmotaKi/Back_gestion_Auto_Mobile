import React, { useState } from 'react';
import axios from 'axios';

function SocietePost() {
    const [values, setValues] = useState({
        id: "",
        RaisonSocial: "",
        ICE: "",
        NumeroCNSS: "",
        NumeroFiscale: "",
        RegistreCommercial: "",
        AdresseSociete: ""
    });

    const [error, setError] = useState("");

    const handleChange = (e) => {
        const { name, value } = e.target;
        setValues({ ...values, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('http://localhost:8000/api/societes', values)
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
                <label htmlFor="id">ID:</label>
                <input type="text" id="id" name="id" value={values.id} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="RaisonSocial">Raison Sociale:</label>
                <input type="text" id="RaisonSocial" name="RaisonSocial" value={values.RaisonSocial} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="ICE">ICE:</label>
                <input type="text" id="ICE" name="ICE" value={values.ICE} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="NumeroCNSS">Numero CNSS:</label>
                <input type="text" id="NumeroCNSS" name="NumeroCNSS" value={values.NumeroCNSS} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="NumeroFiscale">Numero Fiscale:</label>
                <input type="text" id="NumeroFiscale" name="NumeroFiscale" value={values.NumeroFiscale} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="RegistreCommercial">Registre Commercial:</label>
                <input type="text" id="RegistreCommercial" name="RegistreCommercial" value={values.RegistreCommercial} onChange={handleChange} />
            </div>
            <div>
                <label htmlFor="AdresseSociale">Adresse Sociale:</label>
                <input type="text" id="AdresseSociete" name="AdresseSociete" value={values.AdresseSociale} onChange={handleChange} />
            </div>
            <button type="submit">Envoyer</button>
        </form>
    )
    const handledelete=(id)=>{
        const confirm=window.confirm("would you like to delete?");
        if(confirm){
            axios.delete('http://localhost:8000/api/societes'+id)
            .then(res=>{
                
            }
            )
        }

    } 

}

export default SocietePost;
