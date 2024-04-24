import { useState, useEffect } from 'react';
import axios from 'axios';

function SocieteComponent() {
  const [societes, setsocietes] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get('http://localhost:8000/api/societes');
        console.log(response.data);
        setsocietes(response.data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };
    fetchData();
  }, []);

  return (
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Raison Social</th>
          <th>ICE</th>
          <th>Numero CNSS</th>
          <th>Numero Fiscale</th>
          <th>Registre Commercial</th>
          <th>Adresse Societe</th>
        </tr>
      </thead>
      <tbody>
        {societes.map((societe) => (
          <tr key={societe.id}>
            <td>{societe.id}</td>
            <td>{societe.RaisonSocial}</td>
            <td>{societe.ICE}</td>
            <td>{societe.NumeroCNSS}</td>
            <td>{societe.NumeroFiscale}</td>
            <td>{societe.RegistreCommercial}</td>
            <td>{societe.AdresseSociete}</td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}

export default SocieteComponent;
