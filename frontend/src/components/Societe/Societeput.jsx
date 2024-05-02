import React, { useState, useEffect } from 'react';
import axios from 'axios';

function Societeput() {
  const [values, setValues] = useState({
    id: '',
    RaisonSocial: '',
    ICE: '',
    NumeroCNSS: '',
    NumeroFiscale: '',
    RegistreCommercial: '',
    AdresseSociete: '',
  });




  const handleChange = (e) => {
    setValues({ ...values, [e.target.name]: e.target.value });
  };

  const handleUpdate = (e) => {
    e.preventDefault();
    const { id, ...data } = values; // Extracting id from values
    axios.put(`http://localhost:8000/api/societes/${id}`, data)
      .then(res => {
        console.log(res);
        // Handle success, maybe redirect to another page
      })
      .catch(err => {
        if (err.response && err.response.data && err.response.data.errors) {
          const errorMessage = Object.values(err.response.data.errors)[0][0];
          console.error(errorMessage);
        } else {
          console.error("An error occurred. Please try again later.");
        }
      });
  };

  return (
    <form onSubmit={handleUpdate}>
      <div>
        <label htmlFor="id">ID:</label>
        <input type="text" id="id" name="id" value={values.id} onChange={handleChange} />
      </div>
      <div>
        <label htmlFor="RaisonSocial">Raison Social:</label>
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
        <label htmlFor="AdresseSociete">Adresse Sociale:</label>
        <input type="text" id="AdresseSociete" name="AdresseSociete" value={values.AdresseSociete} onChange={handleChange} />
      </div>
      <button type="submit">Update</button>
    </form>
  );
}

export default Societeput;
